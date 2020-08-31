import { Component, OnInit } from '@angular/core';
import { offers } from '../offers';


@Component({
  selector: 'travels',
  templateUrl: './travels.component.html',
  styleUrls: ['./travels.component.css']
})
export class TravelsComponent implements OnInit {
  offers=offers;

  constructor() { }

  ngOnInit(): void {
  }

}
