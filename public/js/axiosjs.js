/**
 * Created by jed on 17/04/2019.
 */

new Vue({
    el: '#root',

    data: {
        title : '',
        fileSel : ''
    },

    methods: {
        project: function () {
            this.fileSel = this.$refs.myFile.files;
            console.log(this.fileSel);
        },
        // secondUpload: function () {
        //   let gameFile = document.getElementById()
        // },
        uploadFile: function () {

            console.log('the upload file method');
            axios.post('/users', {
                firstName: 'Fred',
                lastName: 'Flintstone',
                title: this.title,
                project: this.fileSel[0]
            },
                {
                    headers: {'content-type': 'multipart/form-data'}
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
        }
    }
});

