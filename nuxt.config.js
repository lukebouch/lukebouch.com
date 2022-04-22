require('dotenv').config()
import axios from 'axios'

export default {
    // Target: https://go.nuxtjs.dev/config-target
    target: 'static',

    // Global page headers: https://go.nuxtjs.dev/config-head
    head: {
        title: 'lukebouch.com',
        htmlAttrs: {
            lang: 'en',
        },
        meta: [
            { charset: 'utf-8' },
            {
                name: 'viewport',
                content: 'width=device-width, initial-scale=1',
            },
            { hid: 'description', name: 'description', content: '' },
            { name: 'format-detection', content: 'telephone=no' },
        ],
        link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    },

    // Global CSS: https://go.nuxtjs.dev/config-css
    css: ['@/assets/main.css'],

    // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
    plugins: [],

    // Auto import components: https://go.nuxtjs.dev/config-components
    components: true,

    // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
    buildModules: [
        // https://go.nuxtjs.dev/tailwindcss
        '@nuxtjs/tailwindcss',
    ],

    // Modules: https://go.nuxtjs.dev/config-modules
    modules: [
        '@nuxt/content',
        '@nuxt/http',
        '@nuxtjs/markdownit',
        '@nuxtjs/dayjs',
        '@nuxtjs/feed',
        '@nuxtjs/dotenv',
    ],

    feed: [
        {
            path: '/feed.rss',
            async create(feed) {
                feed.options = {
                    title: 'Luke Bouch',
                    link: 'https://lukebouch.com/feed',
                }

                let posts = await axios
                    .get('https://api.sublimeblogs.com/posts', {
                        headers: {
                            Authorization: `Bearer ${process.env.API_TOKEN}`,
                        },
                    })
                    .then((res) => res.data)

                posts.forEach((post) => {
                    feed.addItem({
                        title: post.title,
                        id: post.id,
                        content: post.content,
                        published: new Date(post.published_at),
                    })
                })

                feed.addContributor({
                    name: 'Luke Bouch',
                    link: 'https://lukebouch.com/',
                })
            },
            cacheTime: 1000 * 60 * 15,
            type: 'rss2',
        },
    ],

    markdownit: {
        runtime: true, // Support `$md()`
    },

    // Content
    content: {
        // Options
    },

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {},
}
