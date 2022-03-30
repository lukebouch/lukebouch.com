<template>
  <div>
    <section class="h-screen flex justify-center items-center text-center">
      <div class="container p-5">
        <img class="w-32 mx-auto mb-12 shadow-xl rounded-full" src="@/assets/images/profile.png" alt="A photo of Luke Bouch.">
        <h1 class="leading-10">Hello 👋<br>
        <span class="text-lg font-normal">name is Luke Bouch.</span></h1>
      </div>
    </section>
    <section>
      <ul>
        <li v-for="post in posts" :key="post.id">
          {{ post.title }}
        </li>
      </ul>
    </section>
  </div>
</template>

<script>
export default {
  name: 'IndexPage',
  data() {
    return {
      posts: [],
    }
  },
  async fetch() {
    this.posts = await this.$http.$get('api.sublimeblogs.com/posts');

    console.log(posts)
    return {
      posts
    }
  }
}
</script>
