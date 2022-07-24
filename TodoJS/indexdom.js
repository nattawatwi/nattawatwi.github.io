function addTodo(){
    let input = document.getElementById('inputtodo').value;
    let newli = document.createElement('li');
    let node = document.createTextNode(input);
    
    newli.className = "list-group-item";
    newli.appendChild(node);
  
    let elist = document.getElementById('todolist');
    elist.appendChild(newli);
  
    var span = document.createElement("SPAN");
    var text = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(text);
    newli.appendChild(span);
  }
  
  let dl = document.querySelector('ul')
  dl.addEventListener('click', (del) => {
    if (del.target.tagName === 'SPAN') {
        let tdlist = document.querySelectorAll('.list-group-item').forEach(td => {
            td.addEventListener('click', () => {
                td.remove()
            })
        })
    }
  })