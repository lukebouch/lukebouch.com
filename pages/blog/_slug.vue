<template>
    <div>
        <h1 v-if="post.title">{{ post.title }}</h1>
        <div class="mt-2 text-gray-600">
            {{ formatDate(post.published_at) }}
        </div>
        <div
            class="post-content"
            v-if="post.content"
            v-html="$md.render(post.content)"
        ></div>
    </div>
</template>

<script>
export default {
    methods: {
        formatDate(date) {
            return this.$dayjs(date).format('h:mma, MM/DD/YYYY')
        },
    },
    async asyncData({ params, $http }) {
        const posts = await $http.$get(
            `https://api.sublimeblogs.com/posts?slug=${params.slug}`,
            {
                headers: {
                    Authorization: `Bearer ${process.env.API_TOKEN}`,
                },
            }
        )
        const post = posts[0]

        return { post }
    },
}
</script>
