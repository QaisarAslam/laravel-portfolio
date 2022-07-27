<div class="content-block" id="projects">
	<header class="block-heading cleafix text-center">
		<h1>Projects</h1>
	</header>
	<div class="projects-items row">
		@foreach ($projects as $project)
			<div class="g-0 col-6 col-sm-4 col-md-3 grid bg-transparent">
				<div class="projects-item effect-zoe">
					<a href="{{ route('project.details', $project->slug) }}">
						<img class="img-fluid border-start border-1" alt="projects" src="{{ asset($project->featured_image) }}">
					</a>
					<figcaption>
						<h2 class="hidden-xs">
							<a href="{{ route('project.details', $project->slug) }}">{{ $project->name }}</a>
						</h2>
					</figcaption>
				</div>
			</div>
		@endforeach
	</div>
	<div class="text-center mt-5">
		<a role="button" href="#" class="btn btn-lg btn-view etx">
			<i class="fa fa-eye"></i>
			<span>View All</span>
		</a>
	</div>
</div>
