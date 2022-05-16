<section>
    <div id="guest_comment" class="uk-container uk-container-small">
        <div>
            <Comment v-for="(comment, index) in comments" v-bind:comment="comment" v-bind:key="index"></Comment>
        </div>
    </div>
</section>