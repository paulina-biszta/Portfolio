import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {
	contact = new FormGroup({
    firstName: new FormControl('',Validators.required),
    lastName: new FormControl('',Validators.required),
    email:new FormControl('',Validators.required),
    message : new FormControl('',Validators.required)
  });

 constructor() { }

 ngOnInit() { window.scrollTo(0, 0);}

 addMessage(){

   if(this.contact.valid)
   {
   var msg = this.contact.value;
   console.log(msg);
   }
 }
}


