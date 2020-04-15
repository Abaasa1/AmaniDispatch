// JavaScript Document
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//Author:BEY A. ABAASA
//warning: Code might give you cancer
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//console.log("the cart js has been loaded");
var cart=[];



//this function saves cart to local storage
//important so that the cart can be viewed from each page
function saveCart(){
	localStorage.setItem("shoppingCart",JSON.stringify(cart));
	}
	
//this function loads the cart from local storage
function loadCart(){	
	cart=JSON.parse(localStorage.getItem("shoppingCart"));	
	return cart;
	}
	
loadCart();

displayCart();
displayOne();				

	
function addCommas(nStr){
 nStr += '';
 var x = nStr.split('.');
 var x1 = x[0];
 var x2 = x.length > 1 ? '.' + x[1] : '';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 return x1 + x2;
}
addCommas(1000);
	//CommaFormatted("1000");
///////////////////////////////////////////////////////////////////////	
//shopping cart functions defined
////////////////////////////////////////////////////////////////////////

//creates items to add to cart

var Item = function(name, price, count){
	this.name=name;
	this.price=price;
	this.count=count;
	};

//add item to cart
function addItemToCart(name, price, count){
	if(cart===undefined ||cart===null || cart.length==0 ){
		cart=[];
		}
	for(var i in cart){
		if(cart[i].name==name){
			cart[i].count=parseInt(count)+parseInt(cart[i].count);
			return;
			}
		}
	var item= new Item(name,price,count);
	//console.log("an item has been added");
	cart.push(item);
	saveCart();
	}
//remove an item from cart
function removeItemFromCart(name){
	if(cart===undefined ||cart===null || cart.length==0 ){
		cart=[];
		}
	for (var i in cart){
		if(cart[i].name==name){
			cart[i].count--;
			if (cart[i].count==0){
				cart.splice(i,1);
				//console.log('it happened');
				displayOneAfterRemoveAll(name);
				}
				break;
			}
		
		}
		saveCart();
	}
	

//remove all items with the same name
function removeItemFromCartAll(name){
	if(cart===undefined ||cart===null || cart.length==0 ){
		cart=[];
		}
	for(var i in cart){
		if(cart[i].name==name){
			cart.splice(i,1);
			displayOneAfterRemoveAll(name);
			break;
			}
		}
		saveCart();
	}
	
//calculate total number of items you have in the cart

function countCart(){
	var totalCount=0;
	if(cart===undefined ||cart===null || cart.length==0 ){
		cart=[];
		}
	for(var i in cart){
		totalCount+=parseInt(cart[i].count);
		}
	return totalCount;
	}

//empties the cart
function clearCart(){
	//console.log("current cart size is "+cart.length);
	
	for(var i=0;i<cart.length;i++){
		displayOneAfterRemoveAll(cart[i].name);
		//console.log("current cart size i "+cart.length);
		}
	cart=[];
	//console.log("current cart size is "+cart.length);
	}

//total cost
function totalCart(){
	if(cart===undefined ||cart===null || cart.length==0 ){
		cart=[];
		}
	var totalCost=0;
	for(var i in cart){
		totalCost+=(parseInt(cart[i].price)*parseInt(cart[i].count));
		}
		
	return totalCost;
	}

//list cart
function listCart(){
	var cartCopy=[];
	for(var i in cart){
		var item =cart[i];
		var itemCopy={};
		for(var p in item){
			itemCopy[p]=item[p];
			}
			cartCopy.push(itemCopy);
		}
		return cartCopy;
	}



function setCountForItem(name,count){
	if(cart===undefined ||cart===null || cart.length==0 ){
		cart=[];
		}
	for(var i in cart){
		if(cart[i].name==name){
			if(count>0){
				cart[i].count=count;				
				}
			if(count<=0){
				removeItemFromCartAll(name);
				displayOneAfterRemoveAll(name);
				//console.log('it reaalyyy happened');
				}
			break;
			}
		}
		saveCart();
	
	}
						
						
$(".add-to-cart").click(function(event){
	event.preventDefault();
	var name =$(this).attr("data-name");
	var price=Number($(this).attr("data-price"));
	addItemToCart(name, price, 1);
	displayCart();
	displayOne();
	});

$(".clear-cart").click(function(event){
	event.preventDefault();	
	clearCart();
	
	displayOne();	
    displayCart();
	});
	loadCart();
	
function displayCart(){
	saveCart();
	var cartArray = listCart();
	var output = "";
	var hidden="";
	for (var i in cart){
		var itemPrice=cartArray[i].count*cartArray[i].price;
		output+="<li>"
		
				+cartArray[i].name+" "
				+" <input style='margin-left:10px; margin-right:20px; margin-top:.5em; width: 200px;display: inline-block;border: 1px solid black;border-radius: 4px;padding: 0.625rem 1.25rem;' class='item-count' type='number' data-name='"+cartArray[i].name.replace(/'/g, '&#39;').replace(/"/g, '&quot;')+"' value='"+cartArray[i].count+"'></input>"
				+"x"+cartArray[i].price
				+" = "+itemPrice
				+" <button class='add-one-item btn btn-cart' data-name='"+cartArray[i].name.replace(/'/g, '&#39;').replace(/"/g, '&quot;')+"' data-price='"+cartArray[i].price+"'>+</button>"
				+" <button class='remove-one-item btn btn-cart' data-name='"+cartArray[i].name.replace(/'/g, '&#39').replace(/"/g, '&quot;')+"' data-price='"+cartArray[i].price+"'>-</button>"
				+" <button class='remove-item-all btn btn-cart' data-name='"+cartArray[i].name.replace(/'/g, '&#39').replace(/"/g, '&quot;')+"' data-price='"+cartArray[i].price+"'>x</button>"
				+"</li>";
		/*hidden="<input style='margin-left:10px; margin-right:20px; margin-top:.5em; width: 100px;display: inline-block;border: 1px solid black;border-radius: 4px;padding: 0.625rem 1.25rem;' class='item-count' type='number' data-name='"+cartArray[i].name+"' value='"+cartArray[i].count+"'></input><br>"+"x"+cartArray[i].price
				+" = "+itemPrice
				+"<br> <button class='add-one-item btn btn-cart' data-name='"+cartArray[i].name.replace(/'/g, '&#39;').replace(/"/g, '&quot;')+"' data-price='"+cartArray[i].price+"'>+</button>"
				+"<br> <button class='remove-one-item btn btn-cart' data-name='"+cartArray[i].name.replace(/'/g, '&#39').replace(/"/g, '&quot;')+"' data-price='"+cartArray[i].price+"'>-</button>"
				+" <br><button class='remove-item-all btn btn-cart' data-name='"+cartArray[i].name.replace(/'/g, '&#39').replace(/"/g, '&quot;')+"' data-price='"+cartArray[i].price+"'>x</button>"
				;
		$("#"+cartArray[i].name.replace(/'/g, '').replace(/"/g, '').replace(/\s+/g,'').replace(/\(/g, '').replace(/\)/g, '').replace(/\&/g, '')).html(hidden);*/
		}
		saveCart();
		
		$("#show-cart").html(output);
		$("#total-cart").html("UGX "+totalCart());
		$(".item-count").change(function(event){
			event.preventDefault();
			var name =$(this).attr("data-name");
			var count=$(this).val();
			setCountForItem(name,count);
			//console.log("count change");
			displayCart();
			displayOne();
			});
		$(".add-one-item").click(function(event){
			event.preventDefault();
           // console.log("this function add has been called");
			var name =$(this).attr("data-name");
			var price=Number($(this).attr("data-price"));
			addItemToCart(name, price, 1);
			displayCart();
			displayOne();	
			});
		
		$(".remove-item-all").click(function(event){
			event.preventDefault();
			var name =$(this).attr("data-name");
			var price=Number($(this).attr("data-price"));
			removeItemFromCartAll(name);
			displayCart();
			displayOne();
			displayOneAfterRemoveAll(name);	
			});
		$(".remove-one-item").click(function(event){
			event.preventDefault();
			var name =$(this).attr("data-name");
			var price=Number($(this).attr("data-price"));
			removeItemFromCart(name);
			displayCart();
			displayOne();
			});
	}
	
	function displayOne(){
    
    //console.log("display one");
		var cartArray = listCart();
        if (cartArray=== undefined || cartArray===null){
        cartArray=[];
    }
		var output = "";
		var hidden="";
		for (var i in cart){
			output=" <input style='margin-left:10px; margin-right:20px; margin-top:.5em; margin-bottom:1em; width: 100px;display: inline-block;border: 1px solid black;border-radius: 4px;padding: 0.625rem 1.25rem;' class='item-count' type='number' data-name='"+cartArray[i].name.replace(/'/g, '&#39;').replace(/"/g, '&quot;')+"' value='"+cartArray[i].count+"'></input><br>";
			
			$("#"+cartArray[i].name.replace(/'/g, '').replace(/"/g, '').replace(/\s+/g,'').replace(/\(/g, '').replace(/\)/g, '').replace(/\&/g, '')).html(output);
			//console.log("changed at "+cartArray[i].name); 
			
			}
		$(".item-count").change(function(event){
			event.preventDefault();
			var name =$(this).attr("data-name");
			var count=$(this).val();
			setCountForItem(name,count);			
			//console.log("name"+name);
			displayCart();
			displayOne();
			});
		
		}
		function displayOneAfterRemoveAll(name){
			$("#"+name.replace(/'/g, '').replace(/"/g, '').replace(/\s+/g,'').replace(/\(/g, '').replace(/\)/g, '').replace(/\&/g, '')).html("");
			//console.log("removed all from "+name);
			
			}
        
    
	
	





