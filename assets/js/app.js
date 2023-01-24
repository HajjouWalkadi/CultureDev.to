let lenght= 1;
$('#txtLenght').val(lenght);
function savemultiple(){
    lenght++;
    document.getElementById("modal2").innerHTML+=` <div class="modal-body">

    <!-- This Input Allows Storing Product Index  -->
    <input type="hidden" id="blog-id" name="blogId">
    <div class="mb-3">
      <label class="form-label">Image</label>
      <input  type="file" class="form-control" name="my_image[]" id="blog-image"/>
    </div>
    
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" class="form-control" name="title[]" id="blog-title" required/>
    </div>
    <div class="mb-3">
      <label class="form-label">Category</label>
      <select class="form-select" id="CategorieInput${lenght}" name= "category[]" id="blog-category" >
        
      </select>
    </div>
    
      <div class="mb-3">
        <label class="form-label">Content</label>
        <!-- <input type="text" class="form-control"  id="blog-description" required/> -->
        <textarea class="form-control" name="content[]" id="blog-description" placeholder="Content..."></textarea>
      </div>
    </div>
    <button class="btn btn-sm btn-danger" id="btnRemove">Delete</button>
  </div>`;
remplireSelect();
$('#txtLenght').val(lenght);

}
$('body').on('click','#btnRemove',function(){
  $(this).closest('div').remove();
  lenght--;
  $('#anothetModel').val(lenght);
  document.getElementById('txtLenght').value = lenght ;
});

function remplireSelect(){
    
    let Categorie = document.getElementById('CategorieInput'+lenght);
    let cat = document.getElementById('CategorieInput').children;
    
   
    
    for(let i= 0 ; i < cat.length ; i++){
        let option = document.createElement("option");
        
        option.text  = cat[i].text;
        option.value = cat[i].value;
        Categorie.appendChild(option);
    }
}