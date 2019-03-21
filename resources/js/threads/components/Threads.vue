<template>
    <div class="card">
        <div class="card-content">
            <span class="card-title">Threads</span>

            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Thread</th>
                    <th>Reply</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="threads in threads_response.data">
                        <td>{{ threads.id }}</td>
                        <td>{{ threads.title }}</td>
                        <td>#</td>
                        <td>
                            <a :href="'/threads/' + threads.id ">open</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-content">
            <span class="card-title">New Thread</span>
                <form @submit.prevent="save()">
                    <div class="input-field">
                        <input type="text" placeholder="Title" v-model="threads_to_save.title"/>
                    </div>
                    <div class="input-field">
                        <textarea class="materialize-textarea" placeholder="Your Text..." v-model="threads_to_save.body">

                        </textarea>
                    </div>
                    <button type="submit" class="btn red accent-2">Send Thread</button>
                </form>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                threads_response : [],
                threads_to_save: {
                    title: '',
                    body: ''
                }
            }
        },
        methods: {
            save() {
                window.axios.post('/threads', this.threads_to_save).then(() => {
                    this.getThreads()
                })
            },
            getThreads() {
                window.axios.get('/threads').then((response) => {
                    this.threads_response = response.data
                })
            }
        },
        mounted() {
            this.getThreads()
        }
    }
</script>
