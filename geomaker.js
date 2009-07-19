/*
  GeoMaker by Christian Heilmann (JavaScripts)
  Version: 1.0
  Homepage: http://icant.co.uk/geomaker/
  Copyright (c) 2009, Christian Heilmann
  Code licensed under the BSD License:
  http://wait-till-i.com/license.txt
*/
(function(){ 
  var loader = new YAHOO.util.YUILoader({ 
    base:'', 
    require:['button','datatable','utilities'], 
    loadOptional:false, 
    combine:true, 
    filter:'MIN', 
    allowRollup: true, 
    onSuccess:function(){ 
      YAHOO.util.Dom.batch(
        ['send','loadcontent','final','restart'],
        function(o){
          if(o){
            var nicebutton = new YAHOO.widget.Button(o); 
          }
        }
      );
      var myColumnDefs = [
        {key:"use",label:"Use",sortable:true},
        {key:"match",label:"Match",sortable:true,parser:"string"},
        {key:"name",label:"Real Name",sortable:true,parser:"string"},
        {key:"type",label:"Type",sortable:true},
        {key:"woeid",label:"WOE ID",sortable:true,parser:"number"},
        {key:"lat",label:"latitude",
         formatter:YAHOO.widget.DataTable.formatFloat,
         sortable:true,parser:"float"},
        {key:"lon",label:"longitude",
         formatter:YAHOO.widget.DataTable.formatFloat,
         sortable:true,parser:"float"}
      ];
      var myDataSource = new YAHOO.util.DataSource(
        YAHOO.util.Dom.get("foundresults")
      );
      myDataSource.responseType = YAHOO.util.DataSource.TYPE_HTMLTABLE;
      myDataSource.responseSchema = { fields: myColumnDefs };
      var myDataTable = new YAHOO.widget.DataTable("sorter", myColumnDefs,
       myDataSource,
       {
         caption:"Found locations",
         sortedBy:{
           key:"match",
           dir:"desc"
         }
       }
      )
    }
}); 
loader.insert(); 
})(); 


