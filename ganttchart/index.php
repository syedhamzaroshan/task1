<html>
    <head>
        <link rel="stylesheet" href="dhtmlxgantt.css"/>
        <script src="dhtmlxgantt.js"></script>
        <style type="text/css" media="screen">
            html, body { margin:0px; padding:0px; height:100%; overflow:hidden; }
        </style>
    </head>
    
    <body>
        <div id="gantt_here" style='width:100%; height:100%;'></div>
        <script type="text/javascript">
                
            let ganttDataArr = [];
        
        	for(let newParntObj=1; newParntObj < 5; newParntObj++ ) {
                let ganttDataObj = {};
                ganttDataObj["id"] = newParntObj;
                ganttDataObj["text"] = "Project"+newParntObj;
                ganttDataObj["start_date"] = "01-04-2024";
                ganttDataObj["duration"] = newParntObj*3;
                ganttDataObj["order"] = "10";
                ganttDataObj["progress"] = "0.6";
                ganttDataObj["open"] = true;
                ganttDataArr.push(ganttDataObj);
            }
        
            for(let newObj = ganttDataArr.length+1; newObj < 10; ++newObj ) {
                let ganttDataObj = {};
                ganttDataObj["id"] = newObj;
                ganttDataObj["text"] = "Task #"+newObj;
                ganttDataObj["start_date"] = "01-04-2024";
                ganttDataObj["duration"] = newObj*2;
                ganttDataObj["order"] = '10';
                ganttDataObj["progress"] = newObj%2;
                ganttDataObj["parent"] = '1';
                ganttDataArr.push(ganttDataObj);
            }

            let tasks =  {
                data: ganttDataArr,
                links:[
                    { id:1, source:1, target:2, type:"1"},
                    { id:2, source:2, target:3, type:"0"},
                    { id:3, source:3, target:4, type:"0"},
                    { id:4, source:2, target:5, type:"2"},
                ]
            };
                    
            gantt.init("gantt_here");
            gantt.parse(tasks);
                    
		</script>        
    </body>
</apex:page>