import type {Bud} from '@roots/bud';

/**
 * bud.js configuration
 */
export default async (bud: Bud) => {
  bud
    .proxy(`https://${process.env.PROJECT_URL}`);
};
