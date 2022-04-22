<template>
    <Main>
        <section class="h-screen flex justify-center items-center text-center">
            <div class="container p-5">
                <img
                    class="w-32 mx-auto mb-12 shadow-xl rounded-full u-photo"
                    src="@/assets/images/profile.png"
                    alt="A photo of Luke Bouch."
                />
                <h1 class="leading-10">
                    Hello 👋<br />
                    <span class="text-lg font-normal"
                        >my name is
                        <a href="https://lukebouch.com" class="h-card p-name"
                            >Luke Bouch</a
                        >.</span
                    >
                </h1>
            </div>
        </section>
        <section class="container-sm p-5">
            <ul class="space-y-5">
                <li
                    class="p-5 rounded-lg border-2"
                    v-for="post in posts"
                    :key="post.id"
                >
                    <NuxtLink :to="'/blog/' + post.slug">
                        <div
                            class="post-content"
                            v-html="post.html_content"
                        ></div>
                        <div class="mt-2 text-gray-600">
                            {{ formatDate(post.published_at) }}
                        </div>
                    </NuxtLink>
                </li>
            </ul>
        </section>
    </Main>
</template>

<script>
import Main from '~/components/layouts/main.vue'
export default {
    name: 'IndexPage',
    methods: {
        formatDate(date) {
            return this.$dayjs(date).format('h:mma, MM/DD/YYYY')
        },
    },
    data() {
        return {
            posts: [],
        }
    },
    async fetch() {
        const response = await this.$http.$get(
            'https://api.sublimeblogs.com/posts',
            {
                headers: {
                    Authorization: `Bearer ${process.env.API_TOKEN}`,
                },
            }
        )
        this.posts = response.data
    },
    components: { Main },
}
</script>
