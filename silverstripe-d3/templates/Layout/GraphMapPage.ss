<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
    <article>
      $LocationForm
      <br />
      <br />
        <div class="content">
			$Content
      <!--   <% with $LocationInfo %>
            <h2>$Name</h2>
            <p>$Address1, $Suburb, $City</p>
            <ul>
               <li>$lat</li>
               <li>$lng</li>
         </ul>
         <% end_with %> -->
         <div class="left">
            $BigMap
            $SmallMap
         </div>
         <div class="right">

            <div class="d3-container">

            </div>
         </div>
        </div>
    </article>
	$Form
	$CommentsForm
</div>
