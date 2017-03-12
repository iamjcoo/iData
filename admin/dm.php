<?php
require_once("../PHPconnect/phpC.php");
if(!isset($_SESSION['idataadmin'])){
    header('Location: ../sign-in.php');
}else{
    $tng = 0;
    $tety = 0;
    $telp = 0;
    $te = 0;
    $fail = 0;
    $pass = 0;
    $tngsummer = 0;
    $tngapril = 0;
    $tngoctober = 0;
    $fperc = 0;
    $pperc = 0;
}
if(isset($_GET['logout'])){
    session_unset();
    header('Location: ../sign-in.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>iData | Mining CSPC Databank for Performance Analysis</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../extra/css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../extra/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../extra/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../extra/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../extra/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../extra/css/themes/all-themes.css" rel="stylesheet" />
    <script src="go.js"></script>
    <script language="JavaScript">

        document.onkeypress = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
            return false;
            }
        }
         document.onmousedown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
            return false;
            }
        }
        document.onkeydown = function (event) {
            event = (event || window.event);
            if (event.keyCode == 123) {
                //alert('No F-keys');
                return false;
            }
        }
        
    </script>
</head>

<body class="theme-blue" onload="init()">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <?php require_once('header.php'); ?>

    <?php require_once('sidebar.php'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Performance Analysis using CHAID Algorithm
                    <small>View in Full Screen? <a href="dmfull.php?period=<?php echo $_GET['period'] ?>">Click Here</a></small>
                </h2>
            </div>
            <div class="row clearfix">
                <div id="sample">
                  <div id="myDiagramDiv" style="background-color: #696969; border: solid 1px black; height:500px"></div>
                  <div>
                    <div id="myInspector">

                    </div>
                  </div>
                  <div>
                    <textarea hidden id="mySavedModel" style="width:100%;height:720px;">{ "class": "go.TreeModel",
                  "nodeDataArray": [
                        <?php require_once('api.php'); ?>
                 ]
                }
                    </textarea>
                  </div>
                </div>
            </div>

        </div>
      </section>

    <!-- Jquery Core Js -->
    <script src="../extra/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../extra/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../extra/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../extra/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../extra/plugins/node-waves/waves.js"></script>

    <!-- Chart Plugins Js -->
    <script src="../extra/plugins/chartjs/Chart.bundle.js"></script>
    <!-- Custom Js -->
    <script src="../extra/js/admin.js"></script>
    <script src="../extra/js/pages/charts/chartjs.js"></script>

    <!-- Demo Js -->
    <script src="../extra/js/demo.js"></script>
    <script>
    $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
      
});
 var nodeIdCounter = -1; // use a sequence to guarantee key uniqueness as we add/remove/modify nodes

  function init() {
    if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
    var $ = go.GraphObject.make;  // for conciseness in defining templates

    myDiagram =
      $(go.Diagram, "myDiagramDiv", // must be the ID or reference to div
        {
          initialContentAlignment: go.Spot.Center,
          maxSelectionCount: 1, // users can select only one part at a time
          validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create trees
          "clickCreatingTool.insertPart": function(loc) {  // customize the data for the new node
            this.archetypeNodeData = {
              key: getNextKey(), // assign the key based on the number of nodes
              name: "(new person)",
              node: ""
            };
            return go.ClickCreatingTool.prototype.insertPart.call(this, loc);
          },
          layout:
            $(go.TreeLayout,
              {
                treeStyle: go.TreeLayout.StyleLastParents,
                arrangement: go.TreeLayout.ArrangementHorizontal,
                // properties for most of the tree:
                angle: 90,
                layerSpacing: 35,
                // properties for the "last parents":
                alternateAngle: 90,
                alternateLayerSpacing: 35,
                alternateAlignment: go.TreeLayout.AlignmentBus,
                alternateNodeSpacing: 20,

              }),
          "undoManager.isEnabled": false // enable undo & blueo
        });

    // when the document is modified, add a "*" to the node and enable the "Save" button
    myDiagram.addDiagramListener("Modified", function(e) {
      var button = document.getElementById("SaveButton");
      if (button) button.disabled = !myDiagram.isModified;
      var idx = document.node.indexOf("*");
      if (myDiagram.isModified) {
        if (idx < 0) document.node += "*";
      } else {
        if (idx >= 0) document.node = document.node.substr(0, idx);
      }
    });

    var levelColors = ["#AC193D/#BF1E4B", "#2672EC/#2E8DEF", "#8C0095/#A700AE", "#5133AB/#643EBF",
                       "#008299/#00A0B1", "#D24726/#DC572E", "#008A00/#00A600", "#094AB2/#0A5BC4"];

    // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
    myDiagram.layout.commitNodes = function() {
      go.TreeLayout.prototype.commitNodes.call(myDiagram.layout);  // do the standard behavior
      // then go through all of the vertexes and set their corresponding node's Shape.fill
      // to a brush dependent on the TreeVertex.level value
      myDiagram.layout.network.vertexes.each(function(v) {
        if (v.node) {
          var level = v.level % (levelColors.length);
          var colors = levelColors[level].split("/");
          var shape = v.node.findObject("SHAPE");
          if (shape) shape.fill = $(go.Brush, "Linear", { 0: colors[0], 1: colors[1], start: go.Spot.Left, end: go.Spot.Right });
        }
      });
    };

    // This function is used to find a suitable ID when modifying/creating nodes.
    // We used the counter combined with findNodeDataForKey to ensure uniqueness.
    function getNextKey() {
      var key = nodeIdCounter;
      while (myDiagram.model.findNodeDataForKey(key.toString()) !== null) {
        key = nodeIdCounter -= 1;
      }
      return key.toString();
    }

    // when a node is double-clicked, add a child to it
    function nodeDoubleClick(e, obj) {
      var clicked = obj.part;
      if (clicked !== null) {
        var thisemp = clicked.data;
        myDiagram.startTransaction("add employee");
        var nextkey = getNextKey();
      }
    }

    // this is used to determine feedback during drags
    function mayWorkFor(node1, node2) {
      if (!(node1 instanceof go.Node)) return false;  // must be a Node
      if (node1 === node2) return false;  // cannot work for yourself
      if (node2.isInTreeOf(node1)) return false;  // cannot work for someone who works for you
      return true;
    }

    // This function provides a common style for most of the TextBlocks.
    // Some of these values may be overridden in a particular TextBlock.
    function textStyle() {
      return { font: "9pt  Segoe UI,sans-serif", stroke: "white" };
    }


    // define the Node template
    myDiagram.nodeTemplate =
      $(go.Node, "Auto",
        { doubleClick: nodeDoubleClick },
        { // handle dragging a Node onto a Node to (maybe) change the reporting relationship
          
          
        },
        // for sorting, have the Node.text be the data.name
        new go.Binding("text", "name"),
        // bind the Part.layerName to control the Node's layer depending on whether it isSelected
        new go.Binding("layerName", "isSelected", function(sel) { return sel ? "Foreground" : ""; }).ofObject(),
        // define the node's outer shape
        $(go.Shape, "Rectangle",
          {
            name: "SHAPE", fill: "white", stroke: null,
            // set the port properties:
            portId: "", fromLinkable: false, toLinkable: false, cursor: "pointer"
          }),
        $(go.Panel, "Horizontal",
          
          $(go.Panel, "Table",
            {
              maxSize: new go.Size(230, 500),
              margin: new go.Margin(6, 10, 6, 2),
              defaultAlignment: go.Spot.Left,
            },
            $(go.RowColumnDefinition, { column: 2, width: 4 }),
            $(go.TextBlock, textStyle(),  // the name
              {
                row: 0, column: 0, columnSpan: 5,
                font: "12pt Segoe UI,sans-serif",
                editable: false, isMultiline: false,
                minSize: new go.Size(15, 16)
              },
              new go.Binding("text", "name").makeTwoWay()),
            $(go.TextBlock, "node: ", textStyle(),
              { row: 1, column: 0 }),
            $(go.TextBlock, textStyle(),
              {
                row: 1, column: 1, columnSpan: 4,
                editable: false, isMultiline: false,
                minSize: new go.Size(15, 17),
                margin: new go.Margin(0, 5, 0, 5)
              },
              new go.Binding("text", "node").makeTwoWay()),
            $(go.TextBlock, textStyle(),
              { row: 2, column: 0 },
              new go.Binding("text", "key", function(v) {return "Category"})),
            $(go.TextBlock, textStyle(),
              { row: 2, column: 4 },
              new go.Binding("text", "key", function(v) {return "%"})),
            $(go.TextBlock, textStyle(),
              { row: 2, column: 10 },
              new go.Binding("text", "key", function(v) {return "n"})),
            $(go.TextBlock, textStyle(),
              { row: 3, column: 0 },
              new go.Binding("text", "key", function(v) {return "Failed"})),
            $(go.TextBlock, textStyle(),
              { row: 3, column: 4 },
              new go.Binding("text", "failp").makeTwoWay()),
            $(go.TextBlock, textStyle(),
              { row: 3, column: 10 },
              new go.Binding("text", "fail").makeTwoWay()),
            $(go.TextBlock, textStyle(),
              { row: 4, column: 0 },
              new go.Binding("text", "key", function(v) {return "Passed"})),
            $(go.TextBlock, textStyle(),
              { row: 4, column: 4 },
              new go.Binding("text", "passp").makeTwoWay()),
            $(go.TextBlock, textStyle(),
              { row: 4, column: 10 },
              new go.Binding("text", "pass").makeTwoWay()),
            $(go.TextBlock, textStyle(),
              { row: 5, column: 0 },
              new go.Binding("text", "key", function(v) {return "____________________"})),
            $(go.TextBlock, textStyle(),
              { row: 5, column: 4 },
              new go.Binding("text", "key", function(v) {return "____________________"})),
            $(go.TextBlock, textStyle(),
              { row: 5, column: 10 },
              new go.Binding("text", "key", function(v) {return "____________________"})),
            $(go.TextBlock, textStyle(),
              { row: 6, column: 0 },
              new go.Binding("text", "key", function(v) {return "TOTAL"})),
            $(go.TextBlock, textStyle(),
              { row: 6, column: 4 },
              new go.Binding("text", "totalp").makeTwoWay()),
            $(go.TextBlock, textStyle(),
              { row: 6, column: 10 },
              new go.Binding("text", "totale").makeTwoWay()),


            $(go.TextBlock, textStyle(),  // the comments
              {
                row: 3, column: 0, columnSpan: 5,
                font: "italic 7pt sans-serif",
                wrap: go.TextBlock.WrapFit,
                editable: false,  // by default newlines are allowed
                minSize: new go.Size(25, 20)
              },
              new go.Binding("text", "comments").makeTwoWay())
          )  // end Table Panel
        ) // end Horizontal Panel
      );  // end Node

    // define the Link template
    myDiagram.linkTemplate =
      $(go.Link, go.Link.Orthogonal,
        { corner: 5, relinkableFrom: false , relinkableTo: false },
        $(go.Shape, { strokeWidth: 4, stroke: "#00a4a4" }));  // the link shape

    // read in the JSON-format data from the "mySavedModel" element
    load();



    // support editing the properties of the selected person in HTML
    if (window.Inspector) myInspector = new Inspector('myInspector', myDiagram,
      {
        properties: {
          'key': { readOnly: true },
          'comments': {}
        }
      });
  }

  // Show the diagram's model in JSON format
  function load() {
    myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
  }

</script>

</body>

</html>
<?php

?>