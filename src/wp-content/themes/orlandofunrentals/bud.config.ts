import type {Bud} from '@roots/bud';

/**
 * bud.js configuration
 */
export default async (bud: Bud) => {
  bud
    .entry('app', ['@scripts/app.js', '@styles/app.scss'])
    .assets('images/**/*.{png,jpg,jpeg,svg,gif}', {
      from: 'assets/images',
      to: 'dist/images',
    })
    .runtime(false)
    .splitChunks(false)
    .watch(['./views', 'app']);
};
