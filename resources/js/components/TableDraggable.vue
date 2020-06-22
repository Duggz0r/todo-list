<template>
    <div class="row">
        <div class="col-md-4">
            <h5>Pending</h5>
            <draggable
                :list="pendingTasks"
                tag="ul"
                group="all-tasks"
                class="draggable-list pl-0"
                ghost-class="moving-card"
                :animation="200"
                @add="onAdd($event, 1)"
            >
                <div v-for="task in tasks" :key="task.id" :data-id="task.id">
                    <div v-if="task.category_id == 1">
                        <a :href="'edit_task/' + task.id">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5>{{ task.title }}</h5>
                                    <p><em>{{ task.description }}</em></p>
                                    <p>Due Date: {{ task.due_date }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </draggable>
        </div>
        <div class="col-md-4">
            <h5>In Progress</h5>
            <draggable
                :list="inprogressTasks"
                tag="ul"
                group="all-tasks"
                class="draggable-list pl-0"
                ghost-class="moving-card"
                :animation="200"
                @add="onAdd($event, 2)"
            >
                <div v-for="task in tasks" :key="task.id" :data-id="task.id">
                    <div v-if="task.category_id == 2">
                        <a :href="'edit_task/' + task.id">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5>{{ task.title }}</h5>
                                    <p><em>{{ task.description }}</em></p>
                                    <p>Due Date: {{ task.due_date }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </draggable>
        </div>
        <div class="col-md-4">
            <h5>Complete</h5>
            <draggable
                :list="completeTasks"
                tag="ul"
                group="all-tasks"
                class="draggable-list pl-0"
                ghost-class="moving-card"
                :animation="200"
                @add="onAdd($event, 3)"
            >
                <div v-for="task in tasks" :key="task.id" :data-id="task.id">
                    <div v-if="task.category_id == 3">
                        <a :href="'edit_task/' + task.id">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5>{{ task.title }}</h5>
                                    <p><em>{{ task.description }}</em></p>
                                    <p>Due Date: {{ task.due_date }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },

        props: {
            categories: {
                type: Array,
                default: [],
            },
            tasks: {
                type: Array,
                default: [],
            }
        },

        data() {
            return {
                pendingTasks: this.pendingTasks,
                inprogressTasks: this.inprogressTasks,
                completeTasks: this.completeTasks
            }
        },


        methods: {
            onAdd(event, category) {
                let id = event.item.getAttribute('data-id');

                axios.patch('/edit/' + id, {
                    category: category
                })
            }
        }
    }
</script>

<style>
    .draggable-list {
        min-height: 100px;
    }
</style>
