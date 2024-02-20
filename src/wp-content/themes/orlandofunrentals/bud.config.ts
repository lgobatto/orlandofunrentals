import type {Bud} from '@roots/bud';

/**
 * bud.js configuration
 */
export default async (bud: Bud) => {
  bud
    .entry('app', ['@scripts/app', '@styles/app'])
    .assets(['images', 'fonts'])
    // eslint-disable-next-line no-undef
    .setPublicPath(`/wp-content/themes/${process.env.PROJECT_NAME}/dist/`)

    .setProxyUrl(`https://${process.env.PROJECT_URL}/`)
    .watch(['./views', 'app'])
    
    .wpjson
    .setSettings({
      color: {
        custom: false,
        customDuotone: false,
        customGradient: false,
        defaultDuotone: false,
        defaultGradients: false,
        defaultPalette: false,
        duotone: [],
      },
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
        },
      },
      spacing: {
        padding: true,
        units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
      },
      typography: {
        customFontSize: false,
      },
    })
    .useTailwindColors()
    .useTailwindFontFamily()
    .useTailwindFontSize();
};
