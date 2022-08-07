import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { products, Product } from '../products';
import { CartService } from '../cart.service';
import { MatSnackBar } from '@angular/material/snack-bar';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {

  phone: Product | undefined;
  constructor(
    private route: ActivatedRoute,
    private cartService: CartService,
    private _snackBar: MatSnackBar
  ) { }

  ngOnInit(): void {
    const routeParams = this.route.snapshot.paramMap;
    const phoneid = Number(routeParams.get('pid'))

    this.phone = products.find(product => product.id === phoneid)
  }

  addToCart(p: Product) {
    this.cartService.addToCart(p);
    this._snackBar.open("Add " + p.name + " to cart", "OK");
    this.cartService.notifyDataChange();
  }

}
