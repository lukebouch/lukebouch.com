<template>
    <Main>
        <div class="container-sm">
            <div class="mb-5">
                <h1 class="mb-0" v-if="post.title">{{ post.title }}</h1>
                <div class="text-gray-600">
                    {{ formatDate(post.published_at) }}
                </div>
            </div>
            <div
                class="post-content"
                v-if="post.html_content"
                v-html="post.html_content"
            ></div>
            <div class="text-center">
                <NuxtLink to="/" class="btn-primary">All Posts</NuxtLink>
            </div>
        </div>
    </Main>
</template>

<script>
import Main from '~/components/layouts/main.vue'
export default {
    methods: {
        formatDate(date) {
            return this.$dayjs(date).format('h:mma, MM/DD/YYYY')
        },
    },
    async asyncData({ params, $http }) {
        const response = await $http.$get(
            `https://api.sublimeblogs.com/posts?slug=${params.slug}`,
            {
                headers: {
                    Authorization: `Bearer ${process.env.API_TOKEN}`,
                },
            }
        )
        const post = response.data[0]
        return { post }
    },
    components: { Main },
}
</script>
