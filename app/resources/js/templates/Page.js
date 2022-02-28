
class Viewmodel extends Vue {

    constructor(config) {
        super({
            ...config,

            data() {
                return {
                    ClassName: "Page"
                };
            },

            mounted() {
                //do stuff
            }
        });
    }
}

window.Viewmodel = Viewmodel;
