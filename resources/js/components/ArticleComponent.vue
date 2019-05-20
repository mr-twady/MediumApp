<template>
    <div>
        <div v-for="article in articles">
            <!-- begin post -->
            <div class="card">
                <a v-bind:href="appBaseUrl+'/articles/'+article.id">
                    <img class="img-fluid" v-bind:src="JSON.parse(article.thumbnail_path)[0]" alt="">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a v-bind:href="appBaseUrl+'/articles/'+article.id">{{article.title}}</a></h2>
                    <h4 class="card-text">{{article.content}}</h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
                            <span class="meta-footer-thumb">
                            <a v-bind:href="'/users/'+article.author"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
                            </span>
                            <span class="author-meta">
                            <span class="post-name"><a v-bind:href="'/users/'+article.author">{{article.name}}</a></span><br/>
                            <span class="post-date">{{article.created_at}}</span><span class="dot"></span>
                            <span class="post-read">{{Math.floor(Math.random() * (10 - 1 + 1)) + 1}} min read</span>
                            </span>
                            <!-- <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end post -->
        </div>
    </div>
</template>
<script>
export default {
    props: ['baseUrl'],

    data() {
        return {
            articles: [],
            appBaseUrl: this.baseUrl,
            // articleUrl: appBaseUrl+'/articles/'
        };
    },
    
    mounted() {
        axios.get(this.baseUrl+'/api/v1/articles')
        .then((response) => {
            if(response.data.has_error == false) {
                this.articles = response.data.data
            } 
        })
        .catch((error) => {
            console.log(error);
        });
    }

}
</script>