import { getCollection } from "astro:content";

export async function getPosts() {
  const posts = await getCollection("posts");
  const sortedPosts = posts
    .filter((post) => {
      return post.data.publish_date && post.data.title;
    })
    .sort(
      (a, b) => b.data.publish_date.getTime() - a.data.publish_date.getTime()
    );

  return sortedPosts;
}
