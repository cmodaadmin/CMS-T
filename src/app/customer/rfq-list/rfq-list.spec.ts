import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RfqList } from './rfq-list';

describe('RfqList', () => {
  let component: RfqList;
  let fixture: ComponentFixture<RfqList>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RfqList]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RfqList);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
