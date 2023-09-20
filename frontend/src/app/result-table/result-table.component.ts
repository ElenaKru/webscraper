import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-result-table',
  templateUrl: './result-table.component.html',
  styleUrls: ['./result-table.component.scss']
})
export class ResultTableComponent implements OnInit {
  crawlerOutcomes: any[] = []; // Initialize as an empty array to hold the outcomes
  i: number = 0; // Initialize the 'i' variable

  constructor(private http: HttpClient) { }

  ngOnInit(): void {
    // Make an HTTP GET request to fetch crawler outcomes from the Laravel backend
    this.http.get<any[]>('http://127.0.0.1:8000/api/crawler-results')
      .subscribe({
        next: (data) => {
          this.crawlerOutcomes = data;
        },
        error: (error) => {
          console.error('Error fetching crawler outcomes:', error);
        }
      });
  }
}
