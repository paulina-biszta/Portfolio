import { Component, OnInit } from '@angular/core';
import { posts } from '../posts';

@Component({
  selector: 'blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {
  posts = posts;

  constructor() { }

  ngOnInit(): void {
  }

}
