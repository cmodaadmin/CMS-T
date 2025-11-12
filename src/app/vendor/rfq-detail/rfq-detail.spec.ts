import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RfqDetail } from './rfq-detail';

describe('RfqDetail', () => {
  let component: RfqDetail;
  let fixture: ComponentFixture<RfqDetail>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RfqDetail]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RfqDetail);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
