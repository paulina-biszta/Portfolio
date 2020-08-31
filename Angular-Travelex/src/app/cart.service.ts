
import { Injectable } from '@angular/core';

@Injectable({
 providedIn: 'root'
})
export class CartService {
 items = [];
 constructor() { }

 addToCart(offers) {
   this.items.push(offers);
 }

 getItems() {
   return this.items;
 }

 clearCart() {
   this.items = [];
   return this.items;
 }
}