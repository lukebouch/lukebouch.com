<template>
  <div>
    <section class="h-screen flex justify-center items-center text-center">
      <div class="container p-5">
        <img class="w-32 mx-auto mb-12 shadow-xl rounded-full" src="@/assets/images/profile.png" alt="A photo of Luke Bouch.">
        <h1 class="leading-10">Hello 👋<br>
        <span class="text-lg font-normal">my name is Luke Bouch.</span></h1>
      </div>
    </section>
    <section class="container-sm p-5">
      <ul class="space-y-5">
        <li class="p-5 rounded-lg border-2" v-for="post in posts" :key="post.id">
          <span v-html="$md.render(post.content)"></span>
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
    this.posts = await this.$http.$get('https://api.sublimeblogs.com/posts', { headers: { 'Authorization': 'Bearer 2|jsQ16wlhekZIXaCmE1NShvr7iDL8z0aOZcZTRora' } });
  }
}
</script>
