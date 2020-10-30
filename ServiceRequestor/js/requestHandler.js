var app = new Vue({
    el: "#allGames",

    data: {
        games: [],
        nothingFound: false
    },
    methods: {
        getAllGames() {
            this.nothingFound = false;
            fetch("services/getAllGames.php")
                .then(res => res.json())
                .then(data => {
                    this.games = data;
                })
                .catch(err => console.log(err));
        },
        getGamesByName() {
            this.nothingFound = false;
            let name = document.querySelector("input[name='name']").value;
            
            const formData = new FormData();
            formData.append("name", name);

            fetch("services/getGamesByName.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data == null || data == false) this.nothingFound = true; 
                else this.games = data; 
                
            })
            .catch(err => console.log(err));
        },
        getGamesByPlatformAndGenre() {
            this.nothingFound = false;
            let platform = document.querySelector("input[name='platform']").value;
            let genre = document.querySelector("input[name='genre']").value;
            
            const formData = new FormData();
            formData.append("platform", platform);
            formData.append("genre", genre);

            fetch("services/getGamesByPlatformAndGenre.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data == null || data == false) this.nothingFound = true;
                else this.games = data;
            })
            .catch(err => console.log(err));
            
        },
    }
})