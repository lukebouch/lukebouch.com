import rss from "@astrojs/rss";
import { getCollection } from "astro:content";
import marked from "../utilities/marked";

export async function get(context) {
  const posts = await getCollection("posts");

  return rss({
    title: "Luke Bouch",
    description: "",
    site: context.site,
    items: posts.map((post) => ({
      title: post.data.title ?? post.slug + " - micropost",
      pubDate: post.data.publish_date,
      content: marked.parse(post.body),
      link: `/posts/${post.slug}/`,
    })),
  });
}
