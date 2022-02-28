
class Viewmodel extends Vue {

    constructor(config) {
        super({
            ...config,

            data() {
                return {
                    ClassName: "HomePage"
                };
            },

            mounted() {
                //do stuff
            }
        });
    }
}

window.Viewmodel = Viewmodel;