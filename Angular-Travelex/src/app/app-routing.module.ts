import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HeroComponent } from './hero/hero.component';
import { HomeComponent } from './home/home.component';
import { BlogComponent } from './blog/blog.component';
import { PostComponent } from './post/post.component';
import { TravelsComponent } from './travels/travels.component';
import { TravelComponent } from './travel/travel.component';
import { CartComponent } from './cart/cart.component';
import { ContactComponent } from './contact/contact.component';

const routes: Routes = [
  {
  path:"", component: HomeComponent 
},{
    path:"blog", component: BlogComponent
},{
  path: 'posts/:xId', component: PostComponent
}
,{
  path: "travels", component: TravelsComponent
},{
  path: 'offers/:oId', component: TravelComponent
},{
  path: 'cart', component: CartComponent
},{
  path: 'contact', component: ContactComponent
}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
