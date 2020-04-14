<!doctype html>
<?php include('database_connection.php') ?>
<?php include('normal_header.php'); ?>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      <title>3D Viewer</title>

      <!-- Page CSS styles and bootstrap, fontawesome includes -->
      <link rel="stylesheet" href="css/page_two.css" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

      <!-- Adding jQuery and the viewer -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdn.babylonjs.com/viewer/babylon.viewer.js"></script>

</head>

<body>

      <!-- Changing the navbar links dynamically -->
      <script>
            $("#link1").text("Home");
            $("#link1").attr('href', 'index.php');
            $("#link2").text("Model Viewer");
            $("#link2").attr('href', 'user_modelView.php');
      </script>

      <!-- 
            This is a model filter, which gives the user the functionality to search the 3D models by name or by category.
      -->
      <div class="list_container">
            <div class="tab_layout">
                  <nav class="tabs">
                        <div class="selector"></div>
                        <a id="one" class="active"><i class="filter_name"></i>Filter by Name</a>
                        <a id="two"><i class="filter_cat"></i>Filter by Category</a>
                  </nav>
            </div>

            <!-- It loads the information from the database, where $modelFileNames is the filename array -->
            <form id="form" autocomplete="off" spellcheck="false">
                  <div class="centerer">
                        <input id="selector" class="chosen-value" type="text" value="" placeholder="Filter by Name">
                        <ul class="value-list">
                              <?php foreach ($modelFileNames as $resultSet) : ?>
                                    <li id="name" class="list_item" onclick='clickfunc(this)'>
                                          <!-- Subtring necessary to remove the .glb at the end of the filenames -->
                                          <?= substr(trim($resultSet), 0, strlen($resultSet) - 4); ?>
                                    </li>
                              <?php endforeach; ?>

                              <div id="clearIt">
                                    <?php foreach ($catArray as $resultSet => $values) : ?>
                                          <li id="category" class="cat_item" onclick='catOpener(this)'>
                                                <i id="icon_setter"></i><?= $values; ?>
                                          </li>
                                    <?php endforeach; ?>
                              </div>
                              <div id="newDiv">
                              </div>
                        </ul>
                  </div>
            </form>
      </div>


      <div class="model_container">
            <p><a class="underlined underlined--thin">Drag and drop or select from the cataogue</a></p>
            <babylon id="toggle-model" class="viewer" templates.nav-bar.params.hide-logo="true" templates.viewer.params.enable-drag-and-drop="true" model="models/boudha.glb"></babylon>
      </div>


      <!-- File name must be all in lowercase for this to work -->
      <!-- Each tab has a fontawesome icon show on hover, and disappears on mouse hover away -->
      <script src="tab_jQuery.js"></script>
      <script>
            $("#category:nth-of-type(1)").on("mouseover", function() {
                  $("#category:nth-of-type(1) > #icon_setter").attr('class', 'fas fa-key');

            });

            $("#category:nth-of-type(1)").on("mouseout", function() {
                  $("#category:nth-of-type(1) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(2)").on("mouseover", function() {
                  $("#category:nth-of-type(2) > #icon_setter").attr('class', 'fas fa-dog');

            });

            $("#category:nth-of-type(2)").on("mouseout", function() {
                  $("#category:nth-of-type(2) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(3)").on("mouseover", function() {
                  $("#category:nth-of-type(3) > #icon_setter").attr('class', 'fas fa-place-of-worship');

            });

            $("#category:nth-of-type(3)").on("mouseout", function() {
                  $("#category:nth-of-type(3) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(4)").on("mouseover", function() {
                  $("#category:nth-of-type(4) > #icon_setter").attr('class', 'fas fa-lightbulb');

            });

            $("#category:nth-of-type(4)").on("mouseout", function() {
                  $("#category:nth-of-type(4) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(5)").on("mouseover", function() {
                  $("#category:nth-of-type(5) > #icon_setter").attr('class', 'fas fa-male');

            });

            $("#category:nth-of-type(5)").on("mouseout", function() {
                  $("#category:nth-of-type(5) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(6)").on("mouseover", function() {
                  $("#category:nth-of-type(6) > #icon_setter").attr('class', 'fas fa-gem');

            });

            $("#category:nth-of-type(6)").on("mouseout", function() {
                  $("#category:nth-of-type(6) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(7)").on("mouseover", function() {
                  $("#category:nth-of-type(7) > #icon_setter").attr('class', 'fas fa-praying-hands');

            });

            $("#category:nth-of-type(7)").on("mouseout", function() {
                  $("#category:nth-of-type(7) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(8)").on("mouseover", function() {
                  $("#category:nth-of-type(8) > #icon_setter").attr('class', 'fas fa-hiking');

            });

            $("#category:nth-of-type(8)").on("mouseout", function() {
                  $("#category:nth-of-type(8) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(9)").on("mouseover", function() {
                  $("#category:nth-of-type(9) > #icon_setter").attr('class', 'fas fa-tree');

            });

            $("#category:nth-of-type(9)").on("mouseout", function() {
                  $("#category:nth-of-type(9) > #icon_setter").attr('class', '');
            });


            $("#category:nth-of-type(10)").on("mouseover", function() {
                  $("#category:nth-of-type(10) > #icon_setter").attr('class', 'fas fa-futbol');

            });

            $("#category:nth-of-type(10)").on("mouseout", function() {
                  $("#category:nth-of-type(10) > #icon_setter").attr('class', '');
            });

            $("#category:nth-of-type(11)").on("mouseover", function() {
                  $("#category:nth-of-type(11) > #icon_setter").attr('class', 'fas fa-puzzle-piece');

            });

            $("#category:nth-of-type(11)").on("mouseout", function() {
                  $("#category:nth-of-type(11) > #icon_setter").attr('class', '');
            });


            // Loading models based on category item
            $("#form").submit(false);
            const newArray = [...document.querySelectorAll(".cat_item")];
            document.getElementById("newDiv").style.display = "none";

            function clickfunc(obj) {
                  var selectedValue = obj.innerText || obj.textContent;
                  selectedValue = selectedValue.toLowerCase();
                  selectedValue += ".glb";
                  BabylonViewer.viewerManager.getViewerPromiseById('toggle-model').then(function(viewer) {
                        viewer.loadModel({

                              url: `models/${selectedValue}`

                        }).then(model => {
                              console.log("model loaded!");
                        }).catch(error => {
                              console.log("error loading the model!", error);
                        });
                  });

            }

            // Functions which loads the categories of 3D models (such as mountains, household items etc)
            // themselves from the database
            function catOpener(obj) {

                  var clearID = document.getElementById("clearIt");
                  var newID = document.getElementById("newDiv");
                  var categoryMapper = new Map();
                  var keyCat;
                  var valCat;

                  <?php foreach ($catArray as $resultSet => $value) : ?>
                        keyCat = "<?php echo $resultSet; ?>";
                        valCat = "<?php echo $value; ?>";
                        categoryMapper.set(keyCat, valCat);
                  <?php endforeach;   ?>

                  var idSetter;
                  var str = obj.innerText.charAt(0).toUpperCase() + obj.innerText.substring(1, obj.innerText.length).toLowerCase().trim();

                  categoryMapper.forEach(function(key, value) {
                        if (key == str) {
                              idSetter = value;
                        }
                  });

                  $.ajax({
                        type: "POST",
                        url: "database_connection.php",
                        data: ({
                              cat_id: idSetter
                        }),
                        success: function(data) {
                              newDiv.innerHTML = "";
                              var arr = data.trim().split(" ");
                              for (var i = 0; i < arr.length; i++) {
                                    newDiv.innerHTML += "<li id=\"catMod\" class=\"catMod_item\" onclick='newFunc(this)'>\n" +
                                          arr[i].substring(0, arr[i].length - 4) +
                                          "</li>";
                              }
                              document.getElementById("newDiv").style.display = "block";
                        },

                        error: function(data) {
                              console.log("Error");
                        },
                        datatype: "json"

                  });

            }

            function newFunc(obj) {
                  var selectedValue = obj.innerText || obj.textContent;
                  selectedValue = selectedValue.toLowerCase();
                  selectedValue += ".glb";
                  BabylonViewer.viewerManager.getViewerPromiseById('toggle-model').then(function(viewer) {
                        viewer.loadModel({

                              url: `models/${selectedValue}`
                        }).then(model => {
                              console.log("model loaded!");
                        }).catch(error => {
                              console.log("error loading the model!", error);
                        });
                  });
                  document.getElementById("newDiv").style.display = "none";
                  $("#selector").val("");
            }
      </script>

</body>

</html>