import { EventEmitter, Injectable, OnInit } from '@angular/core';
import { toArray } from 'rxjs';
import { Product, products } from './products';
import { CartItem } from './products';


@Injectable({
  providedIn: 'root'
})

export class CartService {

  cartitems: Product[] = [];  
  cart: CartItem[] = [];
  quanity = 0;
  totalprice = 0;

  event: EventEmitter<null> = new EventEmitter();
  notifyDataChange(){
    this.event.emit();
  }
  
  constructor() { }
  


  addToCart(p: Product) { 
    let index = -1;
    index = this.cartitems.findIndex(l => l.id === p.id);
        if (index != -1){
          this.cartitems[index].quantity += 1;
        } else if(index === -1){
          this.cartitems.push(p)
        }
        this.sum();
        this.notifyDataChange();
      }
      
      getCartItem() {
        return this.cartitems;
      }
      
      getCartItemCount() {
        return this.cartitems.length;
      }
      
      getTotalPrice(){
        this.notifyDataChange();
        this.sum();
        return this.totalprice
      }
      
      clearCart(){
        this.cartitems = []
        this.notifyDataChange();
        this.totalprice = 0
        this.quanity = 0
        return this.cartitems
      }

      deleteItem(pid: any){
        let index = this.cartitems.findIndex(item => item.id === pid);
        this.cartitems.splice(index, 1);
        this.notifyDataChange();
        this.sum();
      }

      sum(): void {
        this.quanity = 0;
        this.totalprice = 0;
        if(this.cartitems){

          this.cartitems.map(
            products => {
            this.quanity += products.quantity
            this.totalprice += products.price * products.quantity
            }
            )

        }

      }

}
