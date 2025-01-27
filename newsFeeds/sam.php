<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">
function Move(inputControl)
{
  var left = document.getElementById("Left");
  var right = document.getElementById("Right");
  var from, to;
  var bAll = false;
  switch (inputControl.value)
  {
  case '<<':
    bAll = true;
    // Fall through
  case '<':
    from = right; to = left;
    break;
  case '>>':
    bAll = true;
    // Fall through
  case '>':
    from = left; to = right;
    break;
  default:
    alert("Check your HTML!");
  }
  for (var i = from.length - 1; i >= 0; i--)
  {
    var o = from.options[i];
    if (bAll || o.selected)
    {
      from.remove(i);
      try
      {
        to.add(o, null);  // Standard method, fails in IE (6&7 at least)
      }
      catch (e)
      {
        to.add(o); // IE only
      }
    }
  }
}

</script>
</head>

<body>
<select id="Left" multiple="multiple" size="10">
  <option>Some</option>
  <option>List</option>
  <option>Of</option>
  <option>Items</option>
  <option>To</option>
  <option>Move</option>
  <option>Around</option>
</select>

<div id="Toolbar">
  <input type="button" value="&gt;" onclick="Move(this)"/>
  <input type="button" value="&gt;&gt;" onclick="Move(this)"/>
  <input type="button" value="&lt;&lt;" onclick="Move(this)"/>
  <input type="button" value="&lt;" onclick="Move(this)"/>
</div>

<select id="Right" multiple="multiple" size="10">
</select>

</body>
</html>
