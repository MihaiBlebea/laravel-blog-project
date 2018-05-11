function readURL(input)
{
    if(input.files && input.files[0])
    {
        var reader = new FileReader();

        flushContainer('preview-image');

        reader.onload = function (e) {
            mountImg('Mihai', e.target.result, 'preview-image');
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// function that mounts the image with the path from readUrl()
function mountImg(name, src, container_id)
{
    var container = document.getElementById(container_id);
    var img = document.createElement('img');
    img.src = src;
    img.alt = name;
    img.className = 'thumb';
    img.style.width = '200px';
    container.appendChild(img);
}

// Clears the container before mounting the new image
function flushContainer(container_id)
{
    var container = document.getElementById(container_id);
    if(container.hasChildNodes())
    {
        var children = container.childNodes;
        for(let i = 0; i < children.length; i++)
        {
            container.removeChild(children[i]);
        }
    }
}
