// @ts-check

/**
 * Build configuration
 *
 * @see {@link https://bud.js.org/guides/getting-started/configure}
 * @param {import('@roots/bud').Bud} app
 */
export default async (app) => {
  app
    /**
     * Application entrypoints
     */
    .entry({
      app: ["@scripts/app", "@styles/app"],
      editor: ["@scripts/editor", "@styles/editor"],
    })

    /**
     * Directory contents to be included in the compilation
     */
    // .assets(["images"])

    /**
     * Matched files trigger a page reload when modified
     */
    // .watch(["resources/views/**/*", "app/**/*"])

    .watch([
      'resources/views/**/*.blade.php',
      'app/View/**/*.php',
      'front/markup/components/**/*.js',
      'front/markup/static/**/*.js',
      // 'front/markup/components/**/*.scss',
      // 'front/markup/static/**/*.scss',
      'front/dev/static/css/main.css',
    ])

    /**
     * Proxy origin (`WP_HOME`)
     */
    .proxy("http://vateko.loc")

    /**
     * Development origin
     */
    .serve("http://localhost:3008")

    /**
     * URI of the `public` directory
     */
    // .setPublicPath("/app/themes/sage/public/");
};
