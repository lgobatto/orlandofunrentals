#!make
include .env

# to build in a specific platform, use the following command: make init platform=linux/arm64
init:
	@echo 'Start environment setup...'
	@docker buildx build --platform $(if $(strip $(platform)),$(platform),"linux/amd64") . -f ./server/docker/Dockerfile.local
	@make up --no-print-directory
	@make composer command="install" --no-print-directory
	@make yarn command="&& yarn install" --no-print-directory
	@make yarn command="build" --no-print-directory
	@echo 'Environment setup finished.'

up:
	@docker compose up -d $(params)

down:
	@docker compose down $(params)

dev:
	@make yarn command="dev" --no-print-directory
	@make message message="Environment is ready" --no-print-directory

kill:
	@make down params="--volumes --remove-orphans" --no-print-directory
	@docker system prune -a -f --volumes
	
shell:
	@make message message="Type exit to exit shell" --no-print-directory
	@docker compose exec -i -t -w $(if $(strip $(work_dir)),$(work_dir),${DOCUMENT_ROOT}) wordpress bash

composer:
	@echo 'Running composer $(command)...'
	@docker compose exec -i -t -w $(if $(strip $(work_dir)),$(work_dir),${DOCUMENT_ROOT}) wordpress sh -c "composer $(command)"

yarn:
	@echo 'Running yarn $(command)...'
	@docker compose exec -i -t -w $(if $(strip $(work_dir)),$(work_dir),${THEME_ROOT}) wordpress sh -c "yarn $(command)"

cli:
	@docker compose exec -i -t -w $(work_dir) wordpress sh -c "wp $(command) --quiet"

db-backup:
	@echo 'Backup database started'
	@rm -f server/data/${PROJECT_NAME}.sql.gz
	@docker compose exec database mariadb-dump  ${MARIADB_DATABASE} -uroot -p"${MARIADB_ROOT_PASSWORD}"  | gzip > server/data/${PROJECT_NAME}.sql.gz
	@echo 'Backup database finished'

db-restore:
	@echo 'Restore database started'
	@gunzip -c server/data/${PROJECT_NAME}.sql.gz > server/data/${PROJECT_NAME}.sql
	@docker exec -i ${PROJECT_NAME}_database sh -c 'mariadb  -uroot -p"${MARIADB_ROOT_PASSWORD}"  ${MARIADB_DATABASE}' < server/data/${PROJECT_NAME}.sql
	@rm -f server/data/${PROJECT_NAME}.sql
	@echo 'Restore database finished'

permissions:
	@echo 'Fixing permissions for linux compatibility.....'
	@docker compose exec -u root -i -t -w ${DOCUMENT_ROOT} wordpress sh -c "chmod -R 777 content/"
	@echo 'End of fix permissions'

message:
	@echo "$$(tput setaf 3)$(message)$$(tput sgr0)"