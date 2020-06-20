<template>
    <div class="row">
        <div class="col-md-4">
            <h5>Pending</h5>
            <draggable
                tag="ul"
                group="all-tasks"
                class="draggable-list"
                ghost-class="moving-card"
                :list="pendingTasks"
                :animation="200"
            >
                <div v-for="task in tasks">
                    <div v-if="task.category_id == '1'">
                        <a :href="'edit_task/' + task.id">
                            <div class="card">
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
                tag="ul"
                group="all-tasks"
                class="draggable-list"
                ghost-class="moving-card"
                :list="progressTasks"
                :animation="200"
            >
                <div v-for="task in tasks">
                    <div v-if="task.category_id == '2'">
                        <a :href="'edit_task/' + task.id">
                            <div class="card">
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
                tag="ul"
                group="all-tasks"
                class="draggable-list"
                ghost-class="moving-card"
                :list="completeTasks"
                :animation="200"
            >
                <div v-for="task in tasks">
                    <div v-if="task.category_id == '3'">
                        <a :href="'edit_task/' + task.id">
                            <div class="card">
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
<!--
        <div v-for="category in categories" class="col-md-4">
            <h5>{{ category.title }}</h5>
            <draggable
                :list="tasks"
                :group="all-tasks"
                ghost-class="moving-card"
                :animation="200"
                :element="'div'">
                <div v-for="task in tasks">
                    <div v-if="task.category_id == category.id">
                        <a :href="'edit_task/' + task.id">
                            <div class="card">
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
        -->
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

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
