import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RfqsBrowser } from './rfqs-browser';

describe('RfqsBrowser', () => {
  let component: RfqsBrowser;
  let fixture: ComponentFixture<RfqsBrowser>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RfqsBrowser]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RfqsBrowser);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
