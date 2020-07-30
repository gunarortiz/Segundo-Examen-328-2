<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <style type="text/css">	
      body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}

table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}



@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
  
}
.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
  background: rgba(darken($primary,40%), 0.85);
}


.login {
  
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 90%;
  max-width: 320px;
  background: #ffffff;
  position: relative;
  padding-bottom: 80px;
  box-shadow: 0px 1px 5px rgba(0,0,0,0.3);
  
  &.loading {
    button {
      max-height: 100%;
      padding-top: 50px;
      .spinner {
        opacity: 1;
        top: 40%;
      }
    }  
  }
  
  &.ok {
    button {
      background-color: #8bc34a;
      .spinner{
        border-radius: 0;
        border-top-color: transparent;
        border-right-color: transparent;
        height: 20px;
        animation: none;
        transform: rotateZ(-45deg);
      }
    }
  }
  
  
  
  a {
   font-size: 0.8em;   
    color: $primary;
    text-decoration: none;
  }
  
  .title {
    color: #444;
    font-size: 1.2em;
    font-weight: bold;
    margin: 10px 0 30px 0;
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
  }
  
  button {
    width: 100%;
    height: 100%;
    padding: 10px 10px;
    background: $primary;
    color: #fff;
    display: block;
    border: none;
    margin-top: 20px;
    position: absolute;
    left: 0;
    bottom: 0;
    max-height: 60px;
    border: 0px solid rgba(0,0,0,0.1);
  border-radius: 0 0 2px 2px;
    transform: rotateZ(0deg);
    
    transition: all 0.1s ease-out;
      border-bottom-width: 7px;
    
    .spinner {
      display: block;
      width: 40px;
      height: 40px;
      position: absolute;
      border: 4px solid #ffffff;
      border-top-color: rgba(255,255,255,0.3);
      border-radius: 100%;
      left: 50%;
      top: 0;
      opacity: 0;
      margin-left: -20px;
      margin-top: -20px;
      animation: spinner 0.6s infinite linear;
      transition: top 0.3s 0.3s ease,
                opacity 0.3s 0.3s ease,
                border-radius 0.3s ease;
      box-shadow: 0px 1px 0px rgba(0,0,0,0.2);
    }
    
  }
  
    &:not(.loading) button:hover {
      box-shadow: 0px 1px 3px $primary;
    }
    &:not(.loading) button:focus {
      border-bottom-width: 4px;
    }
    
  
}input {
  box-sizing: border-box;
    display: 'flex';
    padding: 15px 10px;
    margin-bottom: 10px;
    margin-right: 10px;
    width: 100%;
    border: 1px solid #ddd;
    transition: border-width 0.2s ease;
    border-radius: 2px;
    color: #ccc;
    
    &+ i.fa {
        color: #fff;
      font-size: 1em;
      position: absolute;
      margin-top: -47px;
      opacity: 0;
      left: 0;
      transition: all 0.1s ease-in;
    }
    
    &:focus {
      &+ i.fa {
        opacity: 1;
        left: 30px;
      transition: all 0.25s ease-out;
      }
      outline: none;
      color: #444;
      border-color: $primary;
      border-left-width: 35px;
    }
    
  }

  </style>
</head>
<body>
  <table>
  <caption>Statement Summary</caption>
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
    </tr>
  </thead>
  <tbody>
    
   
   
  <?php
  foreach($lista as $usuario){
      ?>
  
      <td data-label="Account"><?php echo $usuario->id;?></td>
      <td data-label="Due Date"><?php echo $usuario->nombre?></td>
      <td data-label="Amount"><?php echo $usuario->email?></td>
    </tr>
  <?php
  }
  ?>
  </tbody>
</table> 
<div class="wrapper">
  <form class="login" method="post" >
  

    <p class="title">Adicionar</p>
    <input type="text" placeholder="Nombre" autofocus id="nombre"/>
    <i class="fa fa-user"></i>
    <input type="text" placeholder="Correo" autofocus id="nombre"/>
    <i class="fa fa-user"></i>
    <input type="password" placeholder="Password" id="password"/>
    <i class="fa fa-key"></i>
</br>
    <button>
      <i class="spinner"></i>
      <span class="state">Adicionar</span>
    </button>
  </form>
  
  
</div>
</body>
</html>