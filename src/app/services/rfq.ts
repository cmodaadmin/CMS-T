import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class RfqService {
  private apiUrl = 'http://localhost/api/rfqs.php';

  constructor(private http: HttpClient) { }

  createRfq(rfqData: any): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      })
    };
    return this.http.post(this.apiUrl, rfqData, httpOptions);
  }

  getRfqs(): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      })
    };
    return this.http.get(this.apiUrl, httpOptions);
  }

  getRfq(id: number): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  'application/json',
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      })
    };
    return this.http.get(`${this.apiUrl}?id=${id}`, httpOptions);
  }
}
