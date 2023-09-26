export async function GET({ params, request }) {
    return new Response(
        JSON.stringify({
            date: new Date().toISOString(),
        })
    )
}
