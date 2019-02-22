/**
 * Created by jed on 20/02/2019.
 */
new Vue({
    el:'#app',
    data: {
        range: 0
    },

    methods: {
        addForm: function(){
            console.log('now in the add form method');
            this.range++;
            let displayInput = document.getElementById('addInput');
            let newLabel = document.createElement('label');
            newLabel.className += " form-group col-md-1 col-2";
            let newInput = document.createElement('input');
            newInput.className += " form-control mb-2 mr-sm-2 col-md-7 col-7";
            newInput.placeholder += "Title chapter " + this.range;
            newInput.setAttribute('name', 'name' + this.range);

            let newFile = document.createElement('input');
            newFile.setAttribute('type', 'file');
            newFile.className += " col-md-3 col-3";
            newFile.setAttribute('name', 'chapter-'+ this.range + '-file');

            displayInput.appendChild(newLabel);
            displayInput.appendChild(newInput);
            displayInput.appendChild(newFile);
        }
    }
})