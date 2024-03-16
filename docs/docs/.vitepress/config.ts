import {defineConfig} from 'vitepress'

export default defineConfig({
  title: 'Minify Plugin',
  description: 'Documentation for the Minify plugin',
  base: '/docs/minify/v4/',
  lang: 'en-US',
  head: [
    ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
  ],
  themeConfig: {
    socialLinks: [
      {icon: 'github', link: 'https://github.com/nystudio107'},
      {icon: 'twitter', link: 'https://twitter.com/nystudio107'},
    ],
    logo: '/img/plugin-logo.svg',
    editLink: {
      pattern: 'https://github.com/nystudio107/craft-minify/edit/develop-v4/docs/docs/:path',
      text: 'Edit this page on GitHub'
    },
    algolia: {
      appId: 'AGVNH9S5ER',
      apiKey: 'd7ca5cf1e63a029620f5006e70f54cae',
      indexName: 'nystudio107-minify',
      searchParameters: {
        facetFilters: ["version:v4"],
      },
    },
    lastUpdatedText: 'Last Updated',
    sidebar: [],
    nav: [
      {text: 'Home', link: 'https://nystudio107.com/plugins/minify'},
      {text: 'Store', link: 'https://plugins.craftcms.com/minify'},
      {text: 'Changelog', link: 'https://nystudio107.com/plugins/minify/changelog'},
      {text: 'Issues', link: 'https://github.com/nystudio107/craft-minify/issues'},
      {
        text: 'v4', items: [
          {text: 'v5', link: 'https://nystudio107.com/docs/minify/'},
          {text: 'v4', link: '/'},
          {text: 'v1', link: 'https://nystudio107.com/docs/minify/v1/'},
        ],
      },
    ]
  },
});
