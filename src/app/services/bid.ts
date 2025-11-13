import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class BidService {
  private apiUrl = 'http://localhost/api/bids.php';

  constructor(private http: HttpClient) { }

  createBid(bidData: any): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      })
    };
    return this.http.post(this.apiUrl, bidData, httpOptions);
  }

  getBidsByVendor(): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      })
    };
    return this.http.get(this.apiUrl, httpOptions);
  }

  getBidsByRfq(rfqId: number): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      })
    };
    return this.http.get(`${this.apiUrl}?rfq_id=${rfqId}`, httpOptions);
  }
}
