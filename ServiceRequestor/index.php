<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script defer src="js/requestHandler.js" ></script>

        <link href="css/common.css" rel="stylesheet" type="text/css"></link>

        <title>SoapCA</title>
    </head>
    <body>

        <main class="container-fluid">
            <header class="my-5">
                <h1 class="text-center">CA2 - SOAP Web Services</h1>
                <h5 class="text-center text-muted"><em>Functionality Demonstration Only</em></h5>
            </header>
            <section class="container">
                <div id="allGames">
                    <div class="services-container">
                        <div class="service">
                            <div class="inputs">
                                <label for="name">Game Name</label>
                                <input type="text" placeholder="Enter Name" name="name">
                            </div>
                            <button class="btn btn-primary" @click="getGamesByName">Games By Name</button>
                        </div>
                        <div class="service">
                            <div class="inputs">
                                <label for="platform">Platform(PC,PS4 etc..)</label>
                                <input type="text" placeholder="Enter Platform" name="platform" id="platform">
                            </div>
                            <div class="inputs">
                                <label for="genre">Genre</label>
                                <input type="text" placeholder="Enter Genre" name="genre" id="genre">
                            </div>
                            <button class="btn btn-primary" @click="getGamesByPlatformAndGenre">Games By Platform/Genres</button>
                        </div>
                        <div class="service">
                            <h4 class="mt-2">Display All Games From Database</h4>
                            <button class="btn btn-primary" @click="getAllGames" >ALL Games</button>
                        </div>
                    </div>
                    <div v-if="!nothingFound">
                        <div class="card-container">
                            <div v-for="game in games" :key="game.id" class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{game.name}} - {{game.platform}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{game.release_year}} - {{game.genre}}</h6>
                                    <p class="card-text">{{game.description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div class="alert alert-danger  mt-5" role="alert">
                            <h1 class="text-center">Nothing Found Try Again</h1>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>