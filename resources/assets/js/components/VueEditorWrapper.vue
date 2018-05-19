<template>
    <div>
        <vue-editor v-model="content"></vue-editor>
        <transition enter-active-class="animated fadeInDown"
                    leave-active-class="animated fadeInUp">
            <p v-bind:class="{ invisible: !notify }" class="text-primary">Saved at {{ time() }}</p>
        </transition>
        <input type="hidden" v-model="content" :name="name">
    </div>
</template>

<script>
export default {
    props: ['init-content', 'draft-id', 'api', 'name'],
    data()
    {
        return {
            content: this.initContent,
            draft: this.draftId,
            historyContent: null,
            interval: null,
            intervalLoop: 0,
            savePath: this.api,

            notify: false
        }
    },
    methods:
    {
        autosave: function()
        {
            this.intervalLoop++;
            if(this.content !== this.historyContent)
            {
                var payload = {}
                payload[this.name] = this.content;
                payload['draft_id'] = this.draft;
                    
                axios.post(this.savePath, payload).then((result)=> {
                    this.updateHistory();
                    this.savePrompt();
                    console.log(result)
                }).catch((err)=> {
                    this.stopInterval();
                    console.log(err)
                })
            }
        },
        startInterval: function()
        {
            this.interval = setInterval(()=> {
                this.autosave()
            }, 30000);
        },
        stopInterval: function()
        {
            clearInterval(this.interval);
        },
        clear: function()
        {
            this.content = '';
        },
        updateHistory: function()
        {
            this.historyContent = this.content;
        },
        savePrompt: function()
        {
            this.notify = true;
            setTimeout(()=> {
                this.notify = false;
            }, 2000)
        },
        time: function()
        {
            var d = new Date();
            return d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
        }
    },
    mounted()
    {
        this.startInterval()
    }
}
</script>
