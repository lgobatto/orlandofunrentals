import type {Bud} from '@roots/bud';

/**
 * bud.js configuration
 */
export default async (bud: Bud) => {
  bud
    .entry('app', ['@scripts/app.js', '@styles/app.scss'])
    .assets(['images', 'fonts'])
    .runtime(false)
    .splitChunks(false)
    .watch(['./views', 'app']);
};
