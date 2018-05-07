@extends('layouts.app') 
@section('content') 
@include('partials.breadcrumbs', $data = array('Management Area' => ''))

<script type="text/javascript" src={{ asset('js/profile.js') }} defer></script>
<main>
<div class="container">
    <div class="container scroll_nav">
    <div class="row">
        <h1 class="col-lg col-md col-sm-12">
        Management Area
        </h1>
        <a href="#manage_purchases_title" class="col-lg-auto col-md-auto col-sm-12 text-sm-left">
        Purchases
        </a>
        <a href="#manage_properties_title" class="col-lg-auto col-md-auto col-sm-12 text-sm-left">
        Properties
        </a>
        <a href="#manage_categories_title" class="col-lg-auto col-md-auto col-sm-12 text-sm-left">
        Categories
        </a>
        <a href="#manage_faqs_title" class="col-lg-auto col-md-auto col-sm-12 text-sm-left">
        FAQs
        </a>
    </div>
    </div>
</div>

<div class="container">
    <section class="mt-5">
    <div id="manage_purchases_title" class="jumptarget">
        <h2>Purchases</h2>
    </div>

    <div class="section-container">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">User</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @each('partials.admin_purchase', $processing_purchases,'purchase')
            @each('partials.admin_purchase', $shipped_purchases,'purchase')
        </tbody>
        </table>
        <div class="d-flex justify-content-end">
        <input id="table-save-button" type="button" class="black-button" value="Save">
        </div>
    </div>
    </section>
</div>

<div class="container">
    <section class="mt-5">

    <div id="manage_properties_title" class="jumptarget">
        <h2>Properties</h2>
    </div>

    <div class="cards row">
        @foreach ($properties as $property)
            <div class="mt-4 col-md-6 col-lg-3">
            <div class="box d-flex flex-column">
                <h6>{{$property->name}}</h6>
                <i class="fas fa-trash-alt align-self-end mt-auto"></i>
            </div>
            </div>
        @endforeach
        <div class="mt-4 col-md-6 col-lg-3">
        <div class="box d-flex flex-column last-card" data-toggle="modal" data-target="#addPropertyModal">
            Add Property
        </div>
        </div>
    </div>

    </section>
</div>

<div class="modal fade" id="addPropertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body section-container mt-0">
        <input type="text" class="form-control" id="new_property" placeholder="New Property">
        </div>
        <div class="modal-footer">
        <input type="button" data-dismiss="modal" value="Close"></input>
        <input type="button" class="black-button" value="Save"></input>
        </div>
    </div>
    </div>
</div>


<div class="container">
    <section class="mt-5">

    <div id="manage_categories_title" class="jumptarget">
        <h2>Categories</h2>
    </div>

    <div class="cards categories-cards row">

        @include('partials.admin_category', ['categories'=>$categories, 'properties'=>$properties])

        <div class="mt-4 col-md-6 col-lg-4">
            <div class="box d-flex flex-column last-card" data-toggle="modal" data-target="#addCategoryModal">
                Add Category
            </div>
        </div>

    </div>

    </section>
</div>

    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body section-container mt-0">
            <input type="text" class="form-control" id="new_category" placeholder="New Category">
            </div>
            <div class="modal-footer">
            <input type="button" data-dismiss="modal" value="Close"></input>
            <input type="button" class="black-button" value="Save"></input>
            </div>
        </div>
        </div>
    </div>



    <div class="container">
        <section class="mt-5">
        <div id="manage_faqs_title" class="jumptarget">
            <h2>FAQs</h2>
        </div>
        <div class="cards">
            @foreach ($faqs as $faq)
                <div class="mt-4">
                <div class="box d-flex flex-column question-card">
                    <h6 class="font-weight-bold"> {{$faq->question}}</h6>
                    <p>{{$faq->answer}} </p>
                    <i class="fas fa-trash-alt align-self-end mt-auto"></i>
                </div>
                </div>
            @endforeach
            <div class="mt-4">
            <div class="col box d-flex flex-column last-card" data-toggle="modal" data-target="#addFaqModal">
                Add FAQ
            </div>
            </div>
        </div>
        </section>
    </div>

    <div class="modal fade" id="addFaqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add FAQ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body section-container mt-0">
            <input type="text" id="new_category" placeholder="Question"></input>
            <textarea rows="5" placeholder="Answer"></textarea>
            </div>
            <div class="modal-footer">
            <input type="button" data-dismiss="modal" value="Close"></input>
            <input type="button" class="black-button" value="Save"></input>
            </div>
        </div>
        </div>
    </div>

</main>

 @endsection